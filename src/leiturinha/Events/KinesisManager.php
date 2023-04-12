<?php

namespace Leiturinha\Events;

use Aws\Exception\AwsException;
use Aws\Kinesis\KinesisClient;
use Leiturinha\Object\Enums\Platform;

class KinesisManager
{
    protected $kinesisClient;

    // function __construct() {
    //     $this->kinesisClient = new KinesisClient([
    //         'version' => '2013-12-02',
    //         'region' => getenv('AWS_REGION'),
    //         'credentials' => [
    //             'key' => getenv('AWS_ACCESS_KEY_ID_DEVELOP'),
    //             'secret' => getenv('AWS_SECRET_ACCESS_KEY_DEVELOP')
    //         ]
    //     ]);
    // }

    /**
     * @param $data
     * @param $platform
     */
    public function addEvent($data, $platform)
    {
        try {
            //$this->createRecord($data, $platform);

            $server = "https://playkids-ozymandias-staging.api.leiturinha.com.br";  //TODO
            $endpoint = "/v2/events";
            $url = $server . $endpoint;

            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Cache-Control: no-cache';

            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt( $ch, CURLOPT_TIMEOUT , 30 );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec($ch);
            if (curl_errno($ch))
            {
                curl_error($ch);
            }
            else
            {
                // DEBUG
                //print_r(curl_getinfo($ch));

                // RESULT
                // echo "<pre style='font-size:11px;'>-- RETORNO GENÉRICO (addEvent do SDK Ozymandias):</pre>";
                // $json2 = json_encode(json_decode($result), JSON_PRETTY_PRINT);
                // echo "<pre style='font-size:11px;'>" . $json2 . "</pre><pre><BR></pre>";

                return $result;

            }

        } catch (AwsException $exception) {
            //TODO o que fazer em caso de erro ?
            echo $exception->getMessage();
        }
    }

    /**
     * @param $data
     * @param $platform
     * @return null
     */
    private function createRecord($data, $platform)
    {
        $kinesisStreamName = "";
        switch ($platform) {
            case Platform::PLATFORM_OZYMANDIAS:
                $kinesisStreamName = getenv('KINESIS_STREAM_NAME_OZYMANDIAS');
                break;
        }
        $output = $this->kinesisClient
            ->PutRecord([
                'Data' => $data,
                'StreamName' => $kinesisStreamName,
                'PartitionKey' => (string) time()
            ]);

        if ($output->get('@metadata')["statusCode"] === 200) {
            return $output->get('SequenceNumber');
        }

        return null;
    }
}
