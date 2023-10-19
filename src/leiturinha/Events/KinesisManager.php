<?php

namespace Leiturinha\Events;

use Aws\Exception\AwsException;
use Aws\Kinesis\KinesisClient;
use Leiturinha\Object\Enums\Platform;

class KinesisManager
{
    protected $kinesisClient;

    function __construct() {
        $this->kinesisClient = new KinesisClient([
            'version' => '2013-12-02',
            'region' => getenv('AWS_REGION'),
            'credentials' => [
                'key' => getenv('AWS_ACCESS_KEY_ID_DEVELOP'),
                'secret' => getenv('AWS_SECRET_ACCESS_KEY_DEVELOP')
            ]
        ]);
    }

    /**
     * @param $eventData
     * @param $platform
     */
    public function addEvent($eventData, $platform)
    {
        try {
            $this->createRecord($eventData, $platform);

        } catch (AwsException $exception) {
            //TODO o que fazer em caso de erro ?
            echo $exception->getMessage();
        }
    }

    /**
     * @param $eventData
     * @param $platform
     */
    public function addEventOzy($eventData, $platform)
    {
        try {

            $server = "";
            $header = "";

            $endpoint = "/v2/events";
            $url = $server . $endpoint;

            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Cache-Control: no-cache';
            $headers[] = $header;

            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $eventData);
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

                return $result;
            }

        } catch (AwsException $exception) {
            //TODO o que fazer em caso de erro ?
             echo json_encode([
                 'Erro addEvent - Ozymandias LOCAL: ' => $exception->getMessage(),
                 'Data Event: ' => ''
             ]);
             echo $eventData;

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
            case Platform::PLATFORM_FACEBOOK:
                $kinesisStreamName = getenv('KINESIS_STREAM_NAME_FACEBOOK');
                break;
            case Platform::PLATFORM_SALESFORCE:
                $kinesisStreamName = getenv('KINESIS_STREAM_NAME_SALESFORCE');
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
