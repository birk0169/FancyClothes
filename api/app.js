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
    const queryString = "SELECT * FROM products";
    connection.query(queryString, (err, rows, fields) =>{
        if(err){
            console.log("Failed to query for products" + err);
            res.sendStatus(500);
            throw err;
        }

        //Go through the products from the row and modify them
        const products = rows.map((row) =>{
            return{heading: row.heading, imgSrc: row.imgSrc, imgAlt: row.imgAlt, timestamp: row.productTimestamp, content: row.content, stars: row.stars, category: row.productCategory};
        });

        //Return products as Json
        res.json(products);
        console.log("I thikn we fetcher products successfully");
    });
});


//Get porduct by id
app.get("/product/byId/:id", (req, res) =>{
    console.log('Fetching product with the id: ' + req.param.id);
    //Take id from url
    const productId = req.params.id;
    const queryString = "SELECT * FROM products WHERE productId = ?";
    connection.query(queryString, [productId], (err, rows, fields) =>{
        if(isEmpty(rows)){
            console.log("There are no products with that Id");
        } else{
            if(err){
                console.log("Failed to query product" + err);
                res.sendStatus(500);
                throw err;
            }
    
            console.log("Product fetched successfully");
    
            const product = rows.map((row) =>{
                return{heading: row.heading, imgSrc: row.imgSrc, imgAlt: row.imgAlt, timestamp: row.productTimestamp, content: row.content, stars: row.stars, category: row.productCategory};
            });
    
            res.json(product);
            console.log("I thikn we fetcher the product successfully");
        }
        
    });
});

//Get products by category
app.get("/product/byCat/:category", (req, res) =>{
    console.log('Fetching product with the category: ' + req.param.category);
    //Take id from url
    const productCategory = req.params.category;

    //Build mysql string
    const queryString = "SELECT * FROM products WHERE productCategory = ?";

    //Connect
    connection.query(queryString, [productCategory], (err, rows, fields) =>{
        if(isEmpty(rows)){
            console.log("There are no products with that category");
        } else{
            if(err){
                console.log("Failed to query product" + err);
                res.sendStatus(500);
                throw err;
            }
    
            console.log("Product fetched successfully");
    
            const product = rows.map((row) =>{
                return{heading: row.heading, imgSrc: row.imgSrc, imgAlt: row.imgAlt, timestamp: row.productTimestamp, content: row.content, stars: row.stars, category: row.productCategory};
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