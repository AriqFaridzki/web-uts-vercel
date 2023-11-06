


# Usage for later use

## User_model

### 1. getting from mysql to array list of object model
example :
```php

$list_user = [];
foreach ($result as $row) {
    $list_user[] = new User(
        $row["id_user"],
        $row["nama_depan"]
        //dan lainya......
    );
}

```
### 2. getting value from array list of object model

```php 
    foreach ($list_user as $user) {
        echo "ID User: " . $user->getIdUser() . "<br>";
        echo "Nama Depan: " . $user->getNamaDepan() . "<br>";
        //dan lainnya........
    }
```