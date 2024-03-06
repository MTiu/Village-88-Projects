const string_module = require("./stringlib")();
const my_class = new string_module();

console.log(my_class.concat("Village", "88"));
console.log(my_class.repeat("ha", 3));
console.log(my_class.toString(5));
console.log(my_class.charAt("nice", 2));
