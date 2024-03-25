def withdraw digits
    balance = 1000
    if digits > 10000
        "Error! Maximum is 10000"
    elsif digits < 200
        "Error! Minimum is 200"
    elsif balance < digits
        "Error! Insufficient balance"
    else 
        "Success. Your balance is now #{balance - digits}"
    end
end

puts withdraw 100000 # => 1st Condition
puts withdraw 100 # => 2nd Condition
puts withdraw 2000 # => 3rd Condition
puts withdraw 1000 # => 4th Condition