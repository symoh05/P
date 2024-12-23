<?php
// Include the database connection
include('db.php');

// Query to fetch all products from the database
$sql = "SELECT * FROM products";
$result = $connection->query($sql);  // Execute the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneak&Chic - Clothing, Shoes, Watches and More</title>
    <link rel="stylesheet" href="sty.css">  <!-- Link to your CSS file -->
    <script src="script.js"></script>
    <style>
       /* General page styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #0d1117; /* Replaced with dark background */
    color: #c9d1d9; /* Updated text color */
}


/* Main Title and Description */
h1 {
    text-align: center;
    font-size: 36px;
    color: #4ea8de; /* Updated main heading color */
    font-family: 'Times New Roman', Times, serif;
}

h3{
    text-align: left;
    font-size: 36px;
    color: darkgreen; /* Updated main heading color */
    font-family: cursive;

}

h2 {
    text-align: center;
    font-size: 24px;
    color: rgb(255, 255, 255); /* Orange color for subheading */
    font-weight: lighter;
    font-style: italic;
    font-family: cursive;
}
.off-screen-menu {
    background-color: #0d1117;
    color: rgb(248, 245, 245);
    height: 100vh;
    width: 250px;
    position: fixed;
    top: 0;
    z-index: 1000;
    right: -250px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-size: 1.5rem;
    transition: right 0.3s ease;
}

.off-screen-menu.active {
    right: 0;
}

.off-screen-menu ul {
    list-style: none;
    padding: 0;
}

.off-screen-menu li {
    margin: 20px 0;
    display: block;
    padding: 10px 15px;
    border-bottom: 1px solid #ccc;
}

.off-screen-menu a {
    color: white;
    text-decoration: none;
    font-size: 1.5rem;
}

.ham-menu {
    height: 50px;
    width: 50px;
    margin-left: auto;
    position: relative;
    cursor: pointer;
    z-index: 1000;
}

.ham-menu span {
    height: 5px;
    width: 100%;
    background-color: #fff;
    border-radius: 25px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.ham-menu span:nth-child(1) {
    top: 25%;
}

.ham-menu span:nth-child(2) {
    top: 50%;
}

.ham-menu span:nth-child(3) {
    top: 75%;
}

.ham-menu.active span:nth-child(1) {
    top: 50%;
    transform: translate(-50%, -50%) rotate(45deg);
}

.ham-menu.active span:nth-child(2) {
    opacity: 0;
}

.ham-menu.active span:nth-child(3) {
    top: 50%;
    transform: translate(-50%, 50%) rotate(-45deg);
}


/* Categories Section */
.categories {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    
}

.categories a {
    background-color:rgb(1, 72, 116); /* Orange background */
    color: white;
    padding: 10px 20px;
    margin: 0 10px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    
}

.categories a:hover {
    border: 1px solid rgb(5, 199, 38);
    background: none;
}

/* Product Container */
.product-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 columns on large screens */
    gap: 20px; /* Gap between products */
    padding: 20px;
    justify-items: center;

}

/* Product Card */
.product {
    background-color: #161b22; /* Dark background for product */
    border: 1px solid #30363d; /* Subtle border */
    border-radius: 6px;
    overflow: hidden;
    padding: 1px;
    width: 100%;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease; /* Hover effect */
}

.product:hover {
    transform: translateY(-10px); /* Elevated hover effect */
}

/* Product Image */
.product-image {
    width: 100%;
    height: auto;
    border-radius: 6px;
    max-height: 300px;
}

/* Product Title */
.product h3 {
    font-size: 20px;
    color: #4ea8de; /* Blue for title */
    margin: 10px 0;
}

/* Product Price */
.product p {
    font-size: 16px;
    color: #8b949e; /* Lighter color for product description */
    line-height: 1.5;
}

.product p strong {
    color: #ff6600; /* Orange for emphasis */
}

/* Add to Cart Button */
.product .add-to-cart {
    background-color: #238636; /* Green button for add-to-cart */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.product .add-to-cart:hover {
    background-color: #ff6600; /* Orange hover effect */
}

/* Responsive Design */
@media (max-width: 1024px) {
    .product-container {
        grid-template-columns: repeat(2, 1fr); /* 2 columns for medium screens */
    }
}

@media (max-width: 768px) {
    .product-container {
        grid-template-columns: repeat(2, 1fr); /* 2 columns for smaller screens */
    }

    .categories {
        flex-direction: column;
        margin-top: 20px;
    }

    .categories a {
        margin: 5px 0;
    }
}

@media (max-width: 480px) {
    h1 {
        font-size: 28px;
    }

    h2 {
        font-size: 18px;
    }

    .product-container {
        grid-template-columns: repeat(2, 1fr); /* 2 columns for small screens */
        gap: 20px; /* Maintain gap between products */
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
}

  
  /* Products Section */
  .products {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px;
    gap: 20px;
  }
  
  .product-card {
    background-color: #161b22;
    border: 1px solid #30363d;
    border-radius: 6px;
    width: calc(50% - 20px);
    padding: 10px;
    text-align: center;
    color: #c9d1d9;
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  
  .product-card:hover {
    transform: translateY(-5px); /* Add hover effect */
  }
  
  .product-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 6px;
  }
  
  .product-card h3 {
    margin: 10px 0;
    color: #4ea8de;
  }
  
  .product-card p {
    margin: 10px 0;
    color: #8b949e;
  }
  
  .product-card button {
    background-color: #238636;
    border: none;
    padding: 8px;
    color: #fff;
    border-radius: 6px;
    cursor: pointer;
  }
  
  /* Banner */
  .banner {
    background: linear-gradient(to right, purple, maroon);
    color: #fff;
    text-align: center;
    padding: 50px 20px;
  }
  
  .banner h2 {
    font-size: 2.5em;
    margin-bottom: 10px;
    font-family: cursive;
  }
  
 


    </style>
</head>
<body>
    
    <header>
        <div class="ham-menu" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
        <h1>Sneak&Chic</h1>
        <div class="off-screen-menu" id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="checkout.php">Checkout</a></li>
                <li><a href="login.php">Admin Dashboard</a></li>
                <li><a href="vf.html">home</a></li>
            </ul>
        </div>
    </header>

   
    <section class="banner">
        <h2>Step Up Your Game With Sneak&Chic</h2>
        <p>Stay Sneaky. Stay Chic</p>
    </section>


    <!-- Categories Section -->
    <div class="categories">
        <a href="category.php?category=menwear">Men's Wear</a>
        <a href="category.php?category=womenwear">Women's Wear</a>
        <a href="category.php?category=shoes">Shoes</a>
        <a href="category.php?category=watches">Watches</a>
        <a href="category.php?category=accessories">Accessories</a>
    </div>

    <!-- Product Section -->
    <div class="product-container">
        <?php
        // Check if there are any products in the database
        if ($result->num_rows > 0) {
            // Loop through each product and display it
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Handle image path dynamically and safely
                $imagePath = 'uploads/' . htmlspecialchars($row['image']);
                
                // Display the product image (image filename stored in DB)
                echo '<a href="product.php?id=' . $row['id'] . '"><img src="' . $imagePath . '" alt="' . htmlspecialchars($row['name']) . '" class="product-image"></a>';
                
                // Display product name and price (only in KSH)
                $priceKsh = number_format($row['price_ksh'], 2);  // Use price_ksh directly from the database
                echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                echo '<p><strong>Price:</strong> Ksh ' . $priceKsh . '</p>';
                
                // Link to product detail page
                echo '<a href="product.php?id=' . $row['id'] . '" class="view-details"></a>';
                
                echo '</div>';
            }
        } else {
            // Message when there are no products
            echo '<p>No products available.</p>';
        }
        ?>
    </div>

</body>
</html>

<?php
// Close the database connection
$connection->close();
?>
