<?php
require_once('DatabaseCon.php');

class ProductsData{
    private $table = "products_table";
    private $sku;
    private $name;
    private $price;
    private $productType;
    private $AttributeValue;

    public function SetSku($sku)
    {
        $this -> sku = $sku;
    }
    public function SetName($name)
    {
        $this -> name = $name;
    }
    public function SetPrice($price)
    {
        $this -> price = $price;
    }
    public function SetproductType($AttributeName)
    {
        $this -> productType = $AttributeName;
    }
    public function SetAttributeValue($AttributeValue)
    {
        $this -> AttributeValue = $AttributeValue;
    }

    public function insertData() {
        try {
            $sql = "INSERT INTO $this->table(SKU, name, price,AttributeName,AttributeValue) VALUES (:sku, :name, :price,:AttributeName,:AttributeValue)";
            $statement = DatabaseCon::preparation($sql);
            $statement->bindParam(":sku", $this->sku);
            $statement->bindParam(":name", $this->name);
            $statement->bindParam(":price", $this->price);
            $statement->bindParam(":AttributeName", $this->productType);
            $statement->bindParam(":AttributeValue",$this->AttributeValue);
            if ($statement->execute()) {
                return true;
            } else {
                return ['success' => false, 'message' => 'Failed to insert data'];
            }
        } catch (PDOException $e) {
            echo "Error: ". $e->getMessage();
            return false;
        }
    }
    public function getData() {
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = DatabaseCon::preparation($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function deleteData(array $selectedSKUs)
    {
        $sql="DELETE FROM $this->table WHERE SKU = :SKU";
        $statement = DatabaseCon::preparation($sql);
        foreach ($selectedSKUs as $SKU) {
            $statement->execute(['SKU' => $SKU]);
        }
        return $statement;
    }
}
?>