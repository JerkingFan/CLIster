<?php

class ServerAvailabilityTest
{
    public function run()
    {
        $url = 'http://localhost'; 

        $response = $this->checkServerAvailability($url);

        if ($response['http_code'] !== 200) {
            throw new Exception('Test failed: Expected HTTP 200, got ' . $response['http_code']);
        }

        echo "Server responded with status code: " . $response['http_code'] . "\n";
    }

    private function checkServerAvailability($url)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true); 

        curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return [
            'http_code' => $httpCode
        ];
    }
}
