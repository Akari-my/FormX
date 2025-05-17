<?php

namespace Mellooh\FormX\forms;

use Closure;
use pocketmine\form\Form;
use pocketmine\player\Player;

class SimpleForm implements Form {

    private Closure $callback;
    private string $title = "";
    private string $content = "";
    private array $buttons = [];

    public function __construct(Closure $callback) {
        $this->callback = $callback;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function addButton(string $text, ?string $imageType = null, ?string $imagePath = null): void {
        $button = ['text' => $text];
        if ($imageType !== null && $imagePath !== null) {
            $button['image'] = ['type' => $imageType, 'data' => $imagePath];
        }
        $this->buttons[] = $button;
    }

    public function sendTo(Player $player): void {
        $player->sendForm($this);
    }

    public function handleResponse(Player $player, $data): void {
        if ($data === null) return;
        ($this->callback)($player, $data);
    }

    public function jsonSerialize(): mixed {
        return [
            'type' => 'form',
            'title' => $this->title,
            'content' => $this->content,
            'buttons' => $this->buttons
        ];
    }
}