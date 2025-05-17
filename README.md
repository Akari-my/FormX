# 📦 FormX

**FormX** is an optimized, rewritten version of `FormAPI` compatible with **PocketMine-MP API 5.0.0+**.  
It keeps the **same usage as FormAPI**, so it's easy to use — but under the hood it's **modernized for PHP 8.1, optimized, and dependency-free.**

✅ Same FormAPI syntax  
✅ Works with SimpleForm, ModalForm, CustomForm  
✅ Supports built-in Minecraft textures and image URLs  
✅ Zero dependencies  

---

## 🚀 Features

- Full support for all form types
- Buttons with images (url / texture)
- PHP 8.1 strict typing
- `sendTo($player)` helper
- Built-in clean OOP structure
- FormAPI-style usage

---

## 🍭 Examples

---

### ✅ `SimpleForm` — Without images

```php
use Mellooh\FormX\forms\SimpleForm;

private function sendExampleForm1(Player $player): void {
    $form = new SimpleForm(function(Player $player, $data = null) {
        if ($data === null) return;

        switch ($data) {
            case 0:
                $player->sendMessage("You clicked button 1");
                break;
            case 1:
                $player->sendMessage("You clicked button 2");
                break;
        }
    });

    $form->setTitle("FormX");
    $form->setContent("Choose an option");
    $form->addButton("Button 1");
    $form->addButton("Button 2");
    $form->sendTo($player);
}
```

---

### 🖼️ `SimpleForm` — With texture/images

```php
use Mellooh\FormX\forms\SimpleForm;

private function sendExampleForm2(Player $player): void {
    $form = new SimpleForm(function(Player $player, $data = null) {
        if ($data === null) return;

        switch ($data) {
            case 0:
                $player->sendMessage("You clicked Diamond Chestplate");
                break;
            case 1:
                $player->sendMessage("You clicked Diamond Sword");
                break;
        }
    });

    $form->setTitle("FormX");
    $form->setContent("Choose an option with image:");
    $form->addButton("Chestplate", "path", "textures/items/diamond_chestplate");
    $form->addButton("Sword", "path", "textures/items/diamond_sword");
    $form->sendTo($player);
}
```

---

### 🟡 `ModalForm` — Yes/No Options

```php
use Mellooh\FormX\forms\ModalForm;

private function sendModalForm(Player $player): void {
    $form = new ModalForm(function(Player $player, bool $choice) {
        if($choice){
            $player->sendMessage("You confirmed!");
        } else {
            $player->sendMessage("You cancelled!");
        }
    });

    $form->setTitle("Confirmation");
    $form->setContent("Do you want to continue?");
    $form->setButton1("Yes");
    $form->setButton2("No");
    $form->sendTo($player);
}
```

---

### 🟣 `CustomForm` — Dynamic fields

```php
use Mellooh\FormX\forms\CustomForm;

private function sendCustomForm(Player $player): void {
    $form = new CustomForm(function(Player $player, array $data) {
        $player->sendMessage("You said your name is: " . $data[0]);
        $player->sendMessage("Terms accepted: " . ($data[1] ? "Yes" : "No"));
    });

    $form->setTitle("Custom Form");
    $form->addInput("Name", "Enter your name");
    $form->addToggle("Accept terms?", false);
    $form->sendTo($player);
}
```

---

## 🖼 Supported Images

When using `addButton($text, $imageType, $imagePath)`, you can pass:

| Type    | Example                                     | Description                       |
|---------|---------------------------------------------|-----------------------------------|
| `url`   | `https://example.com/image.png`             | Load image from the internet      |
| `path`  | `textures/items/diamond_sword`              | Built-in Minecraft client texture |


## 🧪 Supported Form Types

| Type         | Class                              |
|--------------|-------------------------------------|
| SimpleForm   | `Mellooh\FormX\forms\SimpleForm`    |
| ModalForm    | `Mellooh\FormX\forms\ModalForm`     |
| CustomForm   | `Mellooh\FormX\forms\CustomForm`    |

---

## 🧰 Installation

1. Download the plugin (or clone).
2. Place `FormX` folder into your `plugins/` directory.
3. Restart PocketMine server.
4. You're ready to use `SimpleForm`, `ModalForm`, and `CustomForm`.

---

## 👨‍💻 Author

Developed with ❤️ by **Mellooh**  

---

## 🪪 License

This plugin is **free and open source**.  
Fork, contribute, and use it on any server, public or private 🎮
