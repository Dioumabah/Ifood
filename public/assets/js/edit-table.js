!function($) {
    "use strict";
var clients = [

];

var countries = [
    {Name: "", Id: 0},
    {Name: "United States", Id: 1},
    {Name: "Canada", Id: 2},
    {Name: "United Kingdom", Id: 3}
];

$("#jsGrid").jsGrid({
    width: "100%",
    height: "400px",
    inserting: true,
    editing: true,
    sorting: true,
    paging: true,
    data: clients,
    fields: [
        {name: "Name", type: "text", width: 150, validate: "required"},
        {name: "Age", type: "number", width: 50},
        {name: "Address", type: "text", width: 200},
        {name: "Country", type: "select", items: countries, valueField: "Id", textField: "Name"},
        {name: "Married", type: "checkbox", title: "Is Married", sorting: false},
        {type: "control"}
    ]
});
}(window.jQuery);
