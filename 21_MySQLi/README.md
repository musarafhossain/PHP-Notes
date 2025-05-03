# MySQLi

- The mysqli extension, or as it is sometimes known, the MySQL improved extension, was developed to take advantage of new features found in MySQL systems versions 4.1.3 and newer. The mysqli extension is included with PHP versions 5 and later. 
- MySQLi Supports only MySQL Database.
- The mysqli extension features a dual interface. It supports :-
    - Procedural Interface
    - Object-Oriented Interface

# Benefit of MySQLi

- Object-oriented interface
- Support for Prepared Statements
- Support for Multiple Statements
- Support for Transactions
- Enhanced debugging capabilities
- Embedded server support

# MySQLi Procedural

## `mysqli_connect()`
- This function is used to open a new connection. It returns an object representing the connection. 
### Syntax
```php
mysqli_connect(db_host, db_user, db_password, db_name, port, socket);
```
### Example
```php
mysqli_connect(“localhost”, “root”, “12345”, “test_db”);
```
## `mysqli_connect_error()`
- This function returns the error description from the last connection error, if any and NULL if no error occurred.

## `mysqli_query()` 
- This function is used to perform a query against the database. For successful `SELECT`, `SHOW`, `DESCRIBE`, or `EXPLAIN` queries it will return a mysqli_result object. For other successful queries it will return `TRUE` and `FALSE` on failure 
### Syntax
```php
mysqli_query(Connection, Query, Result_Mode);
```
### Example 
```php
mysqli_query($conn, $sql);
```
> - **Connection** - It Specifies the connection to use
>- **Query** – It specifies the query string
>- **Result_Mode** – It specifies a constant. Either:
>   - `MYSQLI_USE_RESULT` (Use this if we have to retrieve large amount of data)
>   - `MYSQLI_STORE_RESULT` (This is default)

## `mysqli_num_rows()` 
- It returns the number of rows in a result set.
### Syntax
```php
mysqli_num_rows(mysqli_result);
```
>Where `mysqli_result` specifies a result set identifier returned by `mysqli_query()`, `mysqli_store_result()` or `mysqli_use_result()`
### Example
```php
mysqli_num_rows($result)
```
## `mysqli_fetch_assoc()` 
- It fetches a result row as an associative array. It returns an associative array of strings representing the fetched row. NULL if there are no more rows in result-set. Fieldnames returned from this function are case-sensitive. 
### Syntax
```php
mysqli_fetch_assoc(mysqli_result) 
```
>Where `mysqli_result` specifies a result set identifier returned by `mysqli_query()`, `mysqli_store_result()` or `mysqli_use_result()`
### Example
```php
mysqli_fetch_assoc($result)
```
## `mysqli_error()` 
- The function returns the last error description for the most recent function call, if any. `""` if no error occurred.
### Syntax
```php
mysqli_error(connection);
```
### Example
```php 
mysqli_error($conn);
```
## Connection
```php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "mydb";

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo"Conneted Successfully!<hr>";
```
## Create Database
```php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo"Conneted Successfully!<hr>";

$sql = 'CREATE DATABASE new_db';
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: ". mysqli_error($conn);
}
```
## Create Table
```php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "my_db";
// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo"Conneted Successfully!<hr>";

// Create table
$sql = "CREATE TABLE student (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    roll INT(30) NOT NULL,
    address VARCHAR(200)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table student created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
```
## Read (CRUD)
```php
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: ". $row["id"]. " - Name: ". $row["name"]. " - Address: ". $row["address"]. "<br>";
    }
} else {
    echo "0 results";
} 
```
### Example
```php
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo <<<TABLE
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">ROLL</th>
                <th scope="col">ADDRESS</th>
            </tr>
        </thead>
        <tbody>
    TABLE;

    while ($row = mysqli_fetch_assoc($result)) {
        echo <<<ROW
            <tr>
                <th scope="row">{$row['id']}</th>
                <td>{$row['name']}</td>
                <td>{$row['roll']}</td>
                <td>{$row['address']}</td>
            </tr>
        ROW;
    }

    echo <<<END
        </tbody>
    </table>
    END;

} else {
    echo "0 results";
}
```
## Create (CRUD)
```php
$sql = "INSERT INTO student (name, roll, address) VALUES ('John Doe', '12345', '123 Main St')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} 
```
### Example
```php
<form class="border p-3" action="" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="roll" class="form-label">Roll</label>
        <input type="number" class="form-control" id="roll" name="roll">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    <?php
        if(isset($_REQUEST['submit'])){
            $name = $_REQUEST['name'];
            $roll = $_REQUEST['roll'];
            $address = $_REQUEST['address'];

            // Validate input
            if (empty($name) || empty($roll) || empty($address)) {
                echo "<div class='alert alert-danger'>All fields are required</div>";
            } else{
                $sql = "INSERT INTO student (name, roll, address) VALUES ('$name', '$roll', '$address')";
                if (mysqli_query($conn, $sql)) {
                    echo "<div class='alert alert-success'>New record created successfully</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                }
            }
        }
    ?>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
```
## Delete (CRUD)
```php
$sql = "DELETE FROM student WHERE id=1";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
```
### Example
```php
<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "phpdb";
    // Create connection
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo"Conneted Successfully!<hr>";

    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM student WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success'>Record deleted successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting record: " . mysqli_error($conn) . "</div>";
        }
    }
?>
<?php
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo <<<TABLE
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ROLL</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
        TABLE;

        while ($row = mysqli_fetch_assoc($result)) {
            echo <<<ROW
                <tr>
                    <th scope="row">{$row['id']}</th>
                    <td>{$row['name']}</td>
                    <td>{$row['roll']}</td>
                    <td>{$row['address']}</td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="{$row['id']}">
                            <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"/>
                        </form>
                    </td>
                </tr>
            ROW;
        }

        echo <<<END
            </tbody>
        </table>
        END;

    } else {
        echo "0 results";
    }
?>
```
## Update (CRUD)
```php
$sql = "UPDATE student SET name='Jane Doe Musaraf', roll='6789', address='123 Main St' WHERE id=3";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
```
# CRUD Full Project
```php
<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "db_practice";
    // Create connection
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo"Conneted Successfully!<hr>";

    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM student WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success'>Record deleted successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting record: " . mysqli_error($conn) . "</div>";
        }
    }

    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $roll = $_REQUEST['roll'];
        $address = $_REQUEST['address'];

        // Validate input
        if (empty($name) || empty($roll) || empty($address)) {
            echo "<div class='alert alert-danger'>All fields are required</div>";
        } else{
            $sql = "UPDATE student SET name='$name', roll='$roll', address='$address' WHERE id='$id'";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>Record updated successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Error updating record: " . mysqli_error($conn) . "</div>";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Insert Data</h3>
                <?php
                    if(isset($_REQUEST['edit'])){
                        $id = $_REQUEST['id'];
                        $sql = "SELECT * FROM student WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $name = $row['name'];
                            $roll = $row['roll'];
                            $address = $row['address'];
                        }
                    }
                ?>
                <form class="border p-3" action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($name)) echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="roll" class="form-label">Roll</label>
                        <input type="number" class="form-control" id="roll" name="roll" value="<?php if(isset($roll)) echo $roll; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php if(isset($address)) echo $address; ?>">
                    </div>
                    <?php
                        if(isset($_REQUEST['submit'])){
                            $name = $_REQUEST['name'];
                            $roll = $_REQUEST['roll'];
                            $address = $_REQUEST['address'];

                            // Validate input
                            if (empty($name) || empty($roll) || empty($address)) {
                                echo "<div class='alert alert-danger'>All fields are required</div>";
                            } else{
                                $sql = "INSERT INTO student (name, roll, address) VALUES ('$name', '$roll', '$address')";
                                if (mysqli_query($conn, $sql)) {
                                    echo "<div class='alert alert-success'>New record created successfully</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                                }
                            }
                        }
                    ?>
                    <input type="hidden" name="id" value="<?php if(isset($id)) echo $id?>">
                    <input type="submit" class="btn btn-primary" name="<?php if(isset($result)) echo 'update'; else echo 'submit' ?>" value="<?php if(isset($result)) echo 'Update'; else echo 'Add' ?>"/>
                </form>
            </div>
            <div class="col-sm-8">
                <?php
                    $sql = "SELECT * FROM student";
                    $result = mysqli_query($conn, $sql);
        
                    if (mysqli_num_rows($result) > 0) {
                        echo <<<TABLE
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">ROLL</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                        TABLE;
        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo <<<ROW
                                <tr>
                                    <th scope="row">{$row['id']}</th>
                                    <td>{$row['name']}</td>
                                    <td>{$row['roll']}</td>
                                    <td>{$row['address']}</td>
                                    <td class="d-flex gap-3">
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="{$row['id']}">
                                            <input type="submit" class="btn btn-sm btn-success" name="edit" value="Update"/>
                                        </form>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="{$row['id']}">
                                            <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"/>
                                        </form>
                                    </td>
                                </tr>
                            ROW;
                        }
        
                        echo <<<END
                            </tbody>
                        </table>
                        END;

                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>
```
# MySQLi Object Oriented

## Connection
```php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "phpdb";
// Create connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo"Conneted Successfully!<hr>";
```
## Read (CRUD)
```php
//Read data from table
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: ". $row["id"]. " - Name: ". $row["name"]. " - Address: ". $row["address"]. "<br>";
    }
} else {
    echo "0 results";
}
```
### Example
```php
<?php
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo <<<TABLE
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ROLL</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
        TABLE;

        while($row = $result->fetch_assoc()) {
            echo <<<ROW
                <tr>
                    <th scope="row">{$row['id']}</th>
                    <td>{$row['name']}</td>
                    <td>{$row['roll']}</td>
                    <td>{$row['address']}</td>
                    <td class="d-flex gap-3">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="{$row['id']}">
                            <input type="submit" class="btn btn-sm btn-success" name="edit" value="Update"/>
                        </form>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="{$row['id']}">
                            <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"/>
                        </form>
                    </td>
                </tr>
            ROW;
        }

        echo <<<END
            </tbody>
        </table>
        END;

    } else {
        echo "0 results";
    }
?>
```
## Create (CRUD)
```php
<?php
    $sql = "INSERT INTO student (name, roll, address) VALUES ('John Doe', '12345', '123 Main St')";
    if ($conn->query($sql)=== TRUE) {
        echo "New record created successfully";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
```
### Example
```php
<form class="border p-3" action="" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="roll" class="form-label">Roll</label>
        <input type="number" class="form-control" id="roll" name="roll">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    <?php
        if(isset($_REQUEST['submit'])){
            $name = $_REQUEST['name'];
            $roll = $_REQUEST['roll'];
            $address = $_REQUEST['address'];

            // Validate input
            if (empty($name) || empty($roll) || empty($address)) {
                echo "<div class='alert alert-danger'>All fields are required</div>";
            } else{
                $sql = "INSERT INTO student (name, roll, address) VALUES ('$name', '$roll', '$address')";
                if ($conn->query($sql)=== TRUE) {
                    echo "<div class='alert alert-success'>New record created successfully</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                }
            }
        }
    ?>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
```
## Delete (CRUD)
```php
$sql = "DELETE FROM student WHERE id=1";
if ($conn->query($sql)=== TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
```
### Example
```php
<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "phpdb";
    // Create connection
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo"Conneted Successfully!<hr>";

    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM student WHERE id='$id'";
        if ($conn->query($sql)=== TRUE) {
            echo "<div class='alert alert-success'>Record deleted successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting record: " .  $conn->error . "</div>";
        }
    }
?>
<?php
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo <<<TABLE
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ROLL</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
        TABLE;

        while ($row = mysqli_fetch_assoc($result)) {
            echo <<<ROW
                <tr>
                    <th scope="row">{$row['id']}</th>
                    <td>{$row['name']}</td>
                    <td>{$row['roll']}</td>
                    <td>{$row['address']}</td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="{$row['id']}">
                            <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"/>
                        </form>
                    </td>
                </tr>
            ROW;
        }

        echo <<<END
            </tbody>
        </table>
        END;

    } else {
        echo "0 results";
    }
?>
```
## Update (CRUD)
```php
$sql = "UPDATE student SET name='Jane Doe Musaraf', roll='6789', address='123 Main St' WHERE id=26";
if ($conn->query($sql)=== TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
```
# CRUD Full Project
```php
<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "db_practice";
    // Create connection
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo"Conneted Successfully!<hr>";

    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM student WHERE id='$id'";
        if ($conn->query($sql)=== TRUE) {
            echo "<div class='alert alert-success'>Record deleted successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting record: " . $conn->error . "</div>";
        }
    }

    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $roll = $_REQUEST['roll'];
        $address = $_REQUEST['address'];

        // Validate input
        if (empty($name) || empty($roll) || empty($address)) {
            echo "<div class='alert alert-danger'>All fields are required</div>";
        } else{
            $sql = "UPDATE student SET name='$name', roll='$roll', address='$address' WHERE id='$id'";
            if ($conn->query($sql)=== TRUE) {
                echo "<div class='alert alert-success'>Record updated successfully</div>";
                $name = $roll = $address = "";
            } else {
                echo "<div class='alert alert-danger'>Error updating record: " . $conn->error . "</div>";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Insert Data</h3>
                <?php
                    if(isset($_REQUEST['edit'])){
                        $id = $_REQUEST['id'];
                        $sql = "SELECT * FROM student WHERE id='$id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $name = $row['name'];
                            $roll = $row['roll'];
                            $address = $row['address'];
                        }
                    }
                ?>
                <form class="border p-3" action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($name)) echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="roll" class="form-label">Roll</label>
                        <input type="number" class="form-control" id="roll" name="roll" value="<?php if(isset($roll)) echo $roll; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php if(isset($address)) echo $address; ?>">
                    </div>
                    <?php
                        if(isset($_REQUEST['submit'])){
                            $name = $_REQUEST['name'];
                            $roll = $_REQUEST['roll'];
                            $address = $_REQUEST['address'];

                            // Validate input
                            if (empty($name) || empty($roll) || empty($address)) {
                                echo "<div class='alert alert-danger'>All fields are required</div>";
                            } else{
                                $sql = "INSERT INTO student (name, roll, address) VALUES ('$name', '$roll', '$address')";
                                if ($conn->query($sql)=== TRUE) {
                                    echo "<div class='alert alert-success'>New record created successfully</div>";
                                    $name = $roll = $address = "";
                                } else {
                                    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                                }
                            }
                        }
                    ?>
                    <input type="hidden" name="id" value="<?php if(isset($id)) echo $id?>">
                    <input type="submit" class="btn btn-primary" name="<?php if(isset($result)) echo 'update'; else echo 'submit' ?>" value="<?php if(isset($result)) echo 'Update'; else echo 'Add' ?>"/>
                </form>
            </div>
            <div class="col-sm-8">
                <?php
                    $sql = "SELECT * FROM student";
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        echo <<<TABLE
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">ROLL</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                        TABLE;
        
                        while($row = $result->fetch_assoc()) {
                            echo <<<ROW
                                <tr>
                                    <th scope="row">{$row['id']}</th>
                                    <td>{$row['name']}</td>
                                    <td>{$row['roll']}</td>
                                    <td>{$row['address']}</td>
                                    <td class="d-flex gap-3">
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="{$row['id']}">
                                            <input type="submit" class="btn btn-sm btn-success" name="edit" value="Update"/>
                                        </form>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="{$row['id']}">
                                            <input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"/>
                                        </form>
                                    </td>
                                </tr>
                            ROW;
                        }
        
                        echo <<<END
                            </tbody>
                        </table>
                        END;

                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>

<?php
    $conn->close();
?>
```