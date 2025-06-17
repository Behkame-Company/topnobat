<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Index\RecommendRequest;
use App\Http\Requests\Index\SubjectRequest;
use App\Http\Resources\User\Index\IndexResource;
use App\Models\Doctor;
use App\Services\Llm\ChatService;
use Illuminate\Support\Facades\Auth;

/**
 * @group User
 *
 * @subgroup Search
 */
class IndexController extends Controller
{

    /**
     * Sending Subject
     *
     * @response {
     *  "status": true,
     *  "data": []
     * }
     */
    public function subject(SubjectRequest $request, ChatService $chatService)
    {

        $subject = $request->input('subject');

        $response = $chatService->streamResponse($subject);

        if (!$response) {
            return $this->error('پاسخ دریافت نشد');
        }

        $body = $response->getBody();

        return response()->stream(function () use ($body) {
            $buffer = '';
            while (!$body->eof()) {
                $chunk = $body->read(1024);
                $buffer .= $chunk;

                while (($newlinePos = strpos($buffer, "\n")) !== false) {
                    $line = substr($buffer, 0, $newlinePos);
                    echo "data: " . json_encode(['text' => $line]) . "\n\n";
                    $buffer = substr($buffer, $newlinePos + 1);
                    @ob_flush();
                    flush();
                }
            }

            // Send any remaining buffer content
            if (!empty($buffer)) {
                echo "data: " . json_encode(['text' => $buffer]) . "\n\n";
                @ob_flush();
                flush();
            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
        ]);
    }

    /**
     * Get  Doctor Information
     *
     * @unauthenticated
     *
     * @response {
     *"data": {
     *	"text": "متاسفانه شنیدم که شما دچار سرطان هستید. برای مشکلات مربوط به سرطان، بهتر است به دکتر عمومی مراجعه کنید تا وضعیت شما را بررسی کند و در صورت نیاز به متخصص دیگری ارجاع دهد.",
     *	"top_doctor": {
     *		"id": 9,
     *		"first_name": "Abdullah",
     *		"last_name": "Lemke",
     *		"status": 4
     *	},
     *	"oldest_doctor": {
     *		"id": 9,
     *		"first_name": "Abdullah",
     *		"last_name": "Lemke",
     *		"created_at": "2025-05-14T10:08:06.000000Z"
     *	},
     *	"nearest_doc": {
     *		"id": 8,
     *		"first_name": "Reba",
     *		"last_name": "Barrows",
     *		"distance": 1434.8395786512624
     *	}
     *}
     *}
     */
    public function get_doctor(RecommendRequest $request)
    {
        $user = Auth::user();

        $id = $request->specialty_id;


        $search_data = [
            'top_doctor' => Doctor::get_popular_doctors($id)->first(),
            'oldest_doctor' => Doctor::get_oldest_doctors($id)->first(),
            'nearest_doc' => null,
        ];

        if ($user) {
            $search_data['nearest_doc'] = Doctor::get_nearest_doctors($user->latitude, $user->longitude)->first();
        }

        return new IndexResource($search_data);
    }
}
