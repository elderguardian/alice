<?php

class HelloController extends Controller
{

    public function world(): string
    {
        $kernel = KernelRepository::get();
        $request = $kernel->get(IRequest::class);

        $file = $request->fetchFile('file');
        $newLocation = '/alice/' . uniqid();
        $request->moveFile($file, $newLocation);

        return $this->respond('Uploaded file successfully!');
    }

}