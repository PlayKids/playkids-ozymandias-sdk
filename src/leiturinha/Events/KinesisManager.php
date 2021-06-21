<?php

namespace Leiturinha\Traits;

use Aws\Kinesis\KinesisClient;
use Aws\Exception\AwsException;
use Leiturinha\Object\Platform;

class KinesisManager
{
    protected $kinesisClient;

    function __construct() {
        $this->kinesisClient = new KinesisManager([
            'version' => '2013-12-02',
            'region' => getenv('AWS_REGION'),
            'credentials' => [
                'key' => getenv('AWS_ACCESS_KEY_ID_DEVELOP'),
                'secret' => getenv('AWS_SECRET_ACCESS_KEY_DEVELOP')
            ]
        ]);
    }

    /**
     * @param $data
     * @param $platform
     */
    public function addEvent($data, Platform $platform)
    {
        try {
            $this->createRecord($data, $platform);

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
    private function createRecord($data, Platform $platform)
    {
        $kinesisStreamName = "";
        switch ($platform) {
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
