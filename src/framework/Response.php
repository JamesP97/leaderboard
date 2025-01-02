<?php

namespace Framework;

class Response
{
    public function __construct(public array $data, public int $status = 200)
    {
        $this->handle();
    }

    public function handle()
    {
        echo json_encode([
            'status' => $this->status,
            'data' => $this->data
        ]);
    }
}
