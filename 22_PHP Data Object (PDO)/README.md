# PHP Data Object (PDO)

- PDO is a database access layer which provides a fast and consistent interface for accessing and managing databases in PHP applications. Every DBMS has specific PDO driver(s) that must be installed when you are using PDO in PHP applications. It supports only Object Oriented interface. PDO will work on 12 different database systems.

# Benefits of PDO

- Usability
- Error Handling
- Multiple Databases
- Secure
- Reusability
- Exception Class

# Supported Databases

- CUBRID
- MS SQL Server Sybase
- Firebird
- IBM
- Informix
- MySQL
- MS SQL Server
- Oracle
- ODBC and DB2
- PostgreSQL
- SQLite
- 4D

# Difference and Similarities between MySQLi & PDO
## Differences
- MySQLi supports dual interface Procedural and object-oriented While PDO supports only Object-oriented.
- MySQLi will work only with MySQL Database while PDO will work on 12 different database systems.
## Similarities 
- Both supports Prepared Statements.
- Both provides same level of security.
- Both supports Object-Oriented. 

# PDO - Fetch DB Data/ SELECT

## `query($sql_statement)`
- It executes an SQL statement in a single function call, returning the result set (if any) returned by the statement as a PDOStatement object or `FALSE` on failure.

## `fetch($fetch_Style)`
- It fetches a row from a result set associated with a PDOStatement object. The `fetch_style` parameter determines how PDO returns the row.

## `fetchAll($fetch_Style)`
- It returns an array containing all of the remaining rows in the result set. The array represents each row as either an array of column values or an object with properties corresponding to each column name. An empty array is returned if there are zero results to fetch, or `FALSE` on failure. The `fetch_style` parameter determines how PDO returns the row.

# $fetch_Style

It controls how the next row will be returned to the caller. 

- `PDO::FETCH_BOTH` (default): It returns an array indexed by both column name and 0-indexed column number as returned in your result set.
- `PDO::FETCH_ASSOC`: It returns an array indexed by column name (associative array) as returned in your result set.
- `PDO::FETCH_NUM`: It returns an array indexed by column number (index array) as returned in your result set, starting at column 0
- `PDO::FETCH_OBJ`: It returns an anonymous object with property names that correspond to the column names returned in your result set
- `PDO::FETCH_NAMED`: It returns an array with the same form as `PDO::FETCH_ASSOC`, except that if there are multiple columns with the same name, the value referred to by that key will be an array of all the values in the row that had that column name
- `PDO::FETCH_BOUND`: It returns TRUE and assigns the values of the columns in your result set to the PHP variables to which they were bound with the PDOStatement::bindColumn() method
- `PDO::FETCH_CLASS`: It returns a new instance of the requested class, mapping the columns of the result set to named properties in the class, and calling the constructor afterwards, unless `PDO::FETCH_PROPS_LATE` is also given. If fetch_style includes `PDO::FETCH_CLASSTYPE` (e.g. `PDO::FETCH_CLASS` | `PDO::FETCH_CLASSTYPE`) then the name of the class is determined from a value of the first column.
- `PDO::FETCH_INTO`: It updates an existing instance of the requested class, mapping the columns of the result set to named properties in the class
- `PDO::FETCH_LAZY`: It combines PDO::FETCH_BOTH and PDO::FETCH_OBJ, creating the object variable names as they are accessed
- `PDO::FETCH_PROPS_LATE`: when used with PDO::FETCH_CLASS, the constructor of the class is called before the properties are assigned from the respective column values.

# `rowCount()`

- It returns the number of rows affected by the last `DELETE`, `INSERT`, or `UPDATE` statement executed by the corresponding PDOStatement object.

- If the last SQL statement executed by the associated PDOStatement was a `SELECT` statement, some databases may return the number of rows returned by that statement.

# Insert Data
## `exec($sql_statement)` 
- It executes an SQL statement in a single function call, returning the number of rows affected by the statement. It does not return results from a SELECT statement.

# Connection

```php
$db_host = "localhost";
$db_name = "db_practice";
$dsn = "mysql:host=$db_host; dbname=$db_name";
$db_user = "root";
$db_password = "";

// Create connection
try{
    $conn = new PDO($dsn, $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"Conneted Successfully!<hr>";
} catch(PDOException $e){
    die("Connection failed: ".$e->getMessage());
}
```

# Read (CRUD)
```php
<?php
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        // output data of each row
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: ". $row["id"]. " - Name: ". $row["name"]. " - Address: ". $row["address"]. "<br>";
        }
        foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
            echo "ID: ". $row["id"]. " - Name: ". $row["name"]. " - Address: ". $row["address"]. "<br>";
        }
    } else {
        echo "0 results";
    }
?>
```
### Example
```php
<?php
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
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

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
# Create (CRUD)
```php
<?php
    try {
        $sql = "INSERT INTO student (name, roll, address) VALUES ('John Doe', '12345', '123 Main St')";
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
```
###  Example
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
                try {
                    $sql = "INSERT INTO student (name, roll, address) VALUES ('$name', '$roll', '$address')";
                    $conn->exec($sql);
                    echo "<div class='alert alert-success'>New record created successfully</div>";
                } catch (PDOException $e) {
                    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
                }
            }
        }
    ?>                   
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
```
# Delete (CRUD)
```php
<?php
    try {
        $sql = "DELETE FROM student WHERE id=20";
        $conn->exec($sql);
        echo "Record deleted successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
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

    //Delete Section
    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];
        try {
            $sql = "DELETE FROM student WHERE id=$id";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
# Update (CRUD)
```php
<?php
    try {
        $sql = "UPDATE student SET name='Jane Doe Musaraf', roll='6789', address='123 Main St' WHERE id=1";
        $conn->exec($sql);
        echo "Record updated successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
```
# CRUD Full Project
```php
<?php
    $db_host = "localhost";
    $db_name = "db_practice";
    $dsn = "mysql:host=$db_host; dbname=$db_name";
    $db_user = "root";
    $db_password = "";
   
    
    // Create connection
    try{
        $conn = new PDO($dsn, $db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo"Conneted Successfully!<hr>";
    } catch(PDOException $e){
        die("Connection failed: ".$e->getMessage());
    }

    //Delete Section
    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];
        try {
            $sql = "DELETE FROM student WHERE id=$id";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //Update section
    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $roll = $_REQUEST['roll'];
        $address = $_REQUEST['address'];

        // Validate input
        if (empty($name) || empty($roll) || empty($address)) {
            echo "<div class='alert alert-danger'>All fields are required</div>";
            $name = $roll = $address = "";
        } else{
            try {
                $sql = "UPDATE student SET name='$name', roll='$roll', address='$address' WHERE id='$id'";
                $conn->exec($sql);
                echo "<div class='alert alert-success'>Record updated successfully</div>";
                $name = $roll = $address = "";
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Error updating record: " . $e->getMessage() . "</div>";
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
                        if ($result->rowCount() > 0) {
                            $row = $result->fetch(PDO::FETCH_ASSOC);
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
                                try {
                                    $sql = "INSERT INTO student (name, roll, address) VALUES ('$name', '$roll', '$address')";
                                    $conn->exec($sql);
                                    echo "<div class='alert alert-success'>New record created successfully</div>";
                                    $name = $roll = $address = "";
                                } catch (PDOException $e) {
                                    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
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
        
                    if ($result->rowCount() > 0) {
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
        
                        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
    $conn = null;
?>
```