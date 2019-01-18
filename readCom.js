var mysql = require('mysql');
var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "meWriter"
});

//Prints actors table
function fetchActors(res){
        executeQuery("SELECT * FROM comments", function(result){
        res.write("<table>");
        res.write("<tr>");
        for(var column in result[0]){
            res.write("<td><label>" + column + "</label></td>");
        }
        res.write("</tr>");
        for(var row in result){
            res.write("<tr>");
            for(var column in result[row]){
                res.write("<td><label>" + result[row][column] + "</label></td>");       
            }
            res.write("</tr>");         
        }
        res.write("</table>");
    });
}