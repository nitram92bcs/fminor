<?php
namespace Fminor\Core\Generator;

use Fminor\Core\Config\ParametersManager;

abstract class GeneratorAbstract
{
    abstract public function generate(array $requests, ParametersManager $parManager);
    protected function create($path, $filename, $content)
    {
        $path = __DIR__.'/../../../../'.$path;
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        if (file_exists($path.$filename)) {
            unlink($path.$filename);
        }
        file_put_contents($path.$filename, $content);
    }
    protected function getRequestById(array $requests, $id)
    {
        foreach ($requests as $request) {
            if ($request->getId() === $id) {
                return $request;
            }
        }
    }
}
