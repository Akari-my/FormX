# 📦 Changelog

All notable changes to **FormX** will be documented in this file.  

---

## 📌 [v1.0.1] - 2025-05-17

### ✨ Added

- `addActionButton()` method for **per-button inline callbacks**
- Support for adding **images** (`path` or `url`) with each `addActionButton()`

#### 📘 Example: `addActionButton()`

```php
$form = new SimpleForm();

$form->addActionButton("Button 1", function(Player $p) {
    $p->sendMessage("Hello World!");
}, "path", "textures/items/golden_apple");

$form->addActionButton("Button 1", function(Player $p) {
    $p->teleport(new Vector3(100, 64, 100));
}, "url", "https://example.com/warp_icon.png");

$form->sendTo($player);
```

---

### 🐞 Fixed

- 🛠 Fixed issue where forms appeared **empty/blank** if created in class constructor but not sent
- 🛠 `jsonSerialize()` now always returns correctly structured form components
- 🛠 Missing `Form` interface implementation caused `sendForm()` crash — now resolved ✅

## 🧑‍💻 Contribute

Pull requests are welcome! Fork and improve FormX — or open an issue on GitHub if you have bugs, ideas or suggestions.
