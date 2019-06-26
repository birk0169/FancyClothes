//Load server using express
const express = require('express');
const app = express();
const morgan = require('morgan');
const mysql = require('mysql');

//Set Port
const port = 3000;

//Connect to mysql database
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    database: 'fancy_clothes'
});

app.use(morgan('combine'));

//Get all products
app.get("/products", (req, res) =>{
    // const queryString = "SELECT * FROM products";
    const queryString = "SELECT products.*, users.userName FROM products JOIN users ON products.authorId = users.userId";

    connection.query(queryString, (err, rows, fields) =>{
        if(err){
            console.log("Failed to query for products" + err);
            res.sendStatus(500);
            throw err;
        }

        //Go through the products from the row and modify them
        const products = rows.map((row) =>{
            return{heading: row.heading, imgSrc: row.imgSrc, imgAlt: row.imgAlt, timestamp: row.productTimestamp, content: row.content, stars: row.stars, category: row.productCategory, author: row.userName};
        });

        //Return products as Json
        res.json(products);
        console.log("I thikn we fetcher products successfully");
    });
});


//Get porduct by id
app.get("/product/id/:id", (req, res) =>{
    console.log('Fetching product with the id: ' + req.param.id);
    //Take id from url
    const productId = req.params.id;
    // const queryString = "SELECT * FROM products WHERE productId = ?";
    const queryString = "SELECT products.*, users.userName FROM products JOIN users ON products.authorId = users.userId WHERE productId = ?";
    connection.query(queryString, [productId], (err, rows, fields) =>{
        if(isEmpty(rows)){
            console.log("There are no products with that Id");
            res.json({
                "cod":"404",
                "message" : "id not found"
            });
        } else{
            if(err){
                console.log("Failed to query product" + err);
                res.sendStatus(500);
                throw err;
            }
    
            console.log("Product fetched successfully");
    
            const product = rows.map((row) =>{
                return{heading: row.heading, imgSrc: row.imgSrc, imgAlt: row.imgAlt, timestamp: row.productTimestamp, content: row.content, stars: row.stars, category: row.productCategory, author: row.userName};
            });
    
            res.json(product);
            console.log("I thikn we fetcher the product successfully");
        }
        
    });
});

//Get products by category
app.get("/product/cat/:category", (req, res) =>{
    console.log('Fetching product with the category: ' + req.param.category);
    //Take id from url
    const productCategory = req.params.category;

    //Build mysql string
    // const queryString = "SELECT * FROM products WHERE productCategory = ?"; Old
    const queryString = "SELECT products.*, users.userName FROM products JOIN users ON products.authorId = users.userId WHERE productCategory = ?";


    //Connect
    connection.query(queryString, [productCategory], (err, rows, fields) =>{
        if(isEmpty(rows)){
            console.log("There are no products with that category");
            res.json({
                "cod":"404",
                "message" : "product with category not found"
            });
        } else{
            if(err){
                console.log("Failed to query product" + err);
                res.sendStatus(500);
                throw err;
            }
    
            console.log("Product fetched successfully");
    
            const product = rows.map((row) =>{
                return{heading: row.heading, imgSrc: row.imgSrc, imgAlt: row.imgAlt, timestamp: row.productTimestamp, content: row.content, stars: row.stars, category: row.productCategory, author: row.userName};
            });
    
            res.json(product);
            console.log("I thikn we fetcher products successfully");
        }
        
    });
});

//Get products by author
app.get("/product/author/:author", (req, res) =>{
    console.log('Fetching product with the author: ' + req.param.author);
    //Take id from url
    const productAuthor = req.params.author;

    //Build mysql string
    const queryString = "SELECT products.*, users.userName FROM products JOIN users ON products.authorId = users.userId WHERE userName = ?";

    //Connect
    connection.query(queryString, [productAuthor], (err, rows, fields) =>{
        if(isEmpty(rows)){
            console.log("There are no products with that author");
            res.json({
                "cod":"404",
                "message" : "product with author not found"
            });
        } else{
            if(err){
                console.log("Failed to query product" + err);
                res.sendStatus(500);
                throw err;
            }
    
            console.log("Product fetched successfully");
    
            const product = rows.map((row) =>{
                return{heading: row.heading, imgSrc: row.imgSrc, imgAlt: row.imgAlt, timestamp: row.productTimestamp, content: row.content, stars: row.stars, category: row.productCategory, author: row.userName};
            });
    
            res.json(product);
            console.log("I thikn we fetcher products successfully");
        }
        
    });
});

//Set app to listen on port 3000
app.listen(3000, ()=>{
    console.log(`server is listening on port ${port}`)
})

//functions
function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}