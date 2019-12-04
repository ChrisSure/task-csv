<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 12:36
 */

namespace App\Services;

use App\Entities\User;


class UploadService
{
    private $uploaddir;

    public function upload(array $file): void
    {
        $this->uploaddir = 'uploads/';
        $uploadfile = $this->uploaddir . basename($file['userfile']['name']);
        if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            throw new \Exception("Upload false");
        } else {
            $this->getParseData();
        }
    }

    public function getParseData(): array
    {
        $arrayEntities = array();

        if (($handle = fopen("uploads/test.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $user = new User();
                    $user->fill($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                    $arrayEntities[] = $user;
            }
            fclose($handle);
        }
        return $arrayEntities;
    }
}