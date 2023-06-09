$(document).on('click', '.edit', function() {
  // document.getElementById("name").disabled=false;
  $(this).parent().siblings('td.data').each(function() {
    var content = $(this).html();
    var std = $(this).html('<input value="' + content + '" />');
    console.log(std);
  });
  $(this).siblings('.save').show();
});
$(document).on('click', '.save', function() {
  $('input').each(function() {
    var content = $(this).val();
    $(this).html(content);
    $(this).contents().unwrap();
  });  
  $(this).siblings('.edit').show();
  
});
$('.add').click(function() {
  $(this).parents('table').append('<tr><td class="data"></td><td class="data"></td><td class="data"></td><td><button class="save">Save</button><button class="edit">Edit</button> <button class="delete">Delete</button></td></tr>');  
});
$(document).on('click', '.save', function() {
var row = $(this).parents('tr');
var Name = row.find('input[name="Name"]').val();
// Make an AJAX call to update the database
$.ajax({
url: '../Model/save-to-database.php',
method: 'POST',
data: {/*id: id, */Name: Name/*, Surname:Surname, PhoneNumber:PhoneNumber, Password:Password*/},
success: function(response) {
console.log(response); // Log the response from the server
},
error: function(xhr, status, error) {
console.error(xhr.responseText); // Log any errors to the console
}
});
row.find('.data.Name').html(Name);
});
// Get the table element
const table = document.getElementById('myTable');

// Create an array to store the table data
const data = [];

// Loop through each row in the table
for (let i = 1; i <= table.rows.length; i++) {
  // Get the cells for the current row
  const cells = table.rows[i].cells;

  // Create an object to store the cell data
  const rowData = {
    name: cells[0].innerText,
    surname: cells[1].innerText,
    email: cells[2].innerText,
    phone: cells[3].innerText,
    password: cells[4].innerText
  };

  // Add the row data object to the data array
  data.push(rowData);
}

// Convert the data array to a JSON string
const jsonData = JSON.stringify(data);

// Create a new XMLHttpRequest object
const xhr = new XMLHttpRequest();

// Set the request URL and method
xhr.open('POST', '../Model/save-to-database.php',true);

// Set the request headers
xhr.setRequestHeader('Content-Type', 'application/json');

// Set a callback function for when the request completes
xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
    // Handle the response from the server
    console.log(xhr.responseText);
  }
};

// Send the JSON data as the request body
xhr.send(jsonData);
