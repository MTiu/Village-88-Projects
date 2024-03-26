# Exercise 1
grades = [90, 92, 95, 84, 87, 98, 80]

def average(arr)
    # average = arr.sum / arr.length.to_f
    # puts average.round(2)
    puts "Average: #{(arr.sum / arr.length.to_f).round(2)}"
    arr.reject{|i| i >= 90}
end

puts average(grades).to_s

# Exercise 2
fruits = ["Grapes","Banana","Cherry","Apple","Melon"]

def display_fruits(arr)
    arr.sort.each{|i| puts i}
    arr.select{|i| i.length <= 5}
end

newFruits = display_fruits(fruits)
puts newFruits.to_s

# Exercise 3
alphabet = ('a'..'z').to_a

def display_alphabet(arr)
    vowels = ['a','e','i','o','u']
    arr.shuffle!.shuffle!.shuffle!
    puts "First Letter: #{(vowels.include?(arr[0])) ? arr[0] : "Not a vowel!"}"
end

display_alphabet(alphabet)

# Exercise 4
def generate_rand
    (1..12).collect{rand(100)}
end

array1 = generate_rand
puts array1.to_s

# Exercise 5
def generate_rand2
    arr = (1..12).collect{rand(100)}.sort.reverse
    puts "Lowest: #{arr.min}, Highest: #{arr.max}"
    arr
end

array2 = generate_rand2
puts array2.to_s

# Exercise 6
def rand_captcha
    (1..7).collect{((65+rand(26)).chr)}.join(" ")
end

puts "Captcha: #{rand_captcha}"

def generate_string
    (1..10).collect{(1..7).collect{((65+rand(26)).chr)}.join}
end

puts "String Array: #{generate_string}"