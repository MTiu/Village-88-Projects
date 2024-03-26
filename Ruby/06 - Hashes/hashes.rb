hackerhero = {first_name: "Coding", last_name: "Dojo"}
hackerhero.delete(:last_name);
puts hackerhero
puts "Not Empty!" unless hackerhero.empty?
puts "Has First Name!" if hackerhero.has_key?(:first_name) 
puts "Has the value of First Name!" if hackerhero.has_value?("Coding")