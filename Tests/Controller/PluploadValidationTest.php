<?php

declare(strict_types=1);

namespace Oneup\UploaderBundle\Tests\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class PluploadValidationTest extends AbstractValidationTest
{
    protected function getConfigKey()
    {
        return 'plupload_validation';
    }

    protected function getRequestParameters()
    {
        return [];
    }

    protected function getOversizedFile()
    {
        return new UploadedFile(
            $this->createTempFile(512),
            'cat.ok',
            'text/plain',
            512
        );
    }

    protected function getFileWithCorrectMimeType()
    {
        return new UploadedFile(
            $this->createTempFile(128),
            'cat.txt',
            'text/plain',
            128
        );
    }

    protected function getFileWithCorrectMimeTypeAndIncorrectExtension()
    {
        return new UploadedFile(
            $this->createTempFile(128),
            'cat.txxt',
            'text/plain',
            128
        );
    }

    protected function getFileWithIncorrectMimeType()
    {
        return new UploadedFile(
            $this->createTempFile(128),
            'cat.ok',
            'image/gif',
            128
        );
    }
}
