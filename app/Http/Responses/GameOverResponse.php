<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class GameOverResponse implements Responsable
{
    private $oldX;
    private $oldY;
    private $newX;
    private $newY;
    private $currentPlayerNo;

    public function __construct($oldX, $oldY, $newX, $newY, $currentPlayerNo)
    {
        $this->oldX = $oldX;
        $this->oldY = $oldY;
        $this->newX = $newX;
        $this->newY = $newY;
        $this->currentPlayerNo = $currentPlayerNo;
    }

    public function toResponse($request)
    {
        return response()->json([
            'msg' => 'GAME_OVER',
            'body' => [
                'newLine' => [
                    'start' => [
                        'x' => $this->oldX,
                        'y' => $this->oldY,
                    ],
                    'end' => [
                        'x' => $this->newX,
                        'y' => $this->newY,
                    ],
                ],
                'heading' => 'Game Over',
                'message' => 'Player ' . $this->currentPlayerNo . ' Wins!',
            ],
        ]);
    }
}