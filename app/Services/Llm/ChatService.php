<?php

namespace App\Services\Llm;

use GuzzleHttp\Client;

class ChatService
{
    const HOSTS  = [
        "http://94.182.25.97:48950/api/generate",
        "http://5.202.27.65:48950/api/generate"
    ];
    const MODEL = "qwen3:14b";
    // const KEY   = "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";

    public function streamResponse(string $subject)
    {
        $client = new Client();
        foreach (self::HOSTS as $host) {
            try {
                return $client->post($host, [
                    'headers' => [
                        // 'Authorization' => 'Bearer ' . self::KEY,
                        'Accept'        => 'text/event-stream',
                        'Content-Type'  => 'application/json',
                    ],
                    'stream' => true,
                    'timeout' => 10,
                    'json'   => [
                        'model'  => self::MODEL,
                        'prompt' => $this->system_content() . $subject,
                    ],
                ]);
            } catch (\Throwable $e) {
                continue;
            }
        }
    }

    private function system_content(): string
    {
        return "
    You are a medical appointment assistant who replies only in , with no emotional expressions.
    Your tone is friendly and human-like, but you must not provide any medical advice or recommend medications.
    Explain why you suggest a particular specialty and give your preliminary diagnosis in exactly two lines.
    Dont Ask Question From User. Just Do What Asked for.Only Do This instructions.If there is no relevent speciatlty dont suggest any thing just

    Output format:
    - First provide your explanation in two lines in Persian.
    - Then, on the next line, return only [ID].
    - If no suitable specialty can be found, return only [-1] on a separate line.
    - only when ask question from user if user didnt mention any symptoms aks the user to say its problem
    - if user didnt ask for a spicialty just ask user to explain the symptoms 

  
            ---

            List of Specialties:
                1: متخصص مغز و اعصاب (Neurologist)  
                2: جراح لثه (Periodontist)  
                3: دکتر عمومی (General Practitioner)  
                4: جراح کلیه و مجاری ادراری (Urologist)  
                5: متخصص داخلی (Internist)  
                6: متخصص قلب و عروق (Cardiologist)  
                7: متخصص گوارش (Gastroenterologist)  
                8: متخصص زنان و زایمان (Gynecologist)  
                9: متخصص پوست و مو (Dermatologist)  
                10: متخصص چشم (Ophthalmologist)  
                11: متخصص گوش و حلق و بینی (ENT Specialist)  
                12: متخصص ریه (Pulmonologist)   ّ
                13: روانپزشک (Psychiatrist)  
                14: متخصص ارتوپدی (Orthopedic Surgeon)  
                15: جراح عمومی (General Surgeon)  
                16: متخصص غدد (Endocrinologist)  
                17: متخصص عفونی (Infectious Disease Specialist)  
                18: متخصص خون و سرطان (Hematologist/Oncologist)  
                19: متخصص اطفال (Pediatrician)  
                20: متخصص اورژانس (Emergency Medicine Specialist)  
 ّ

            ---
            ";
    }
}
