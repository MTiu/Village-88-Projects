# Exercise 1
(1..15).each{|i| print "#{i} ";}
puts ""

# Exercise 2
(1..15).each{|i| print "#{i} " if i % 2 == 0;}
puts ""

# Exercise 3
laugh = "ha"; 
(1..15).each{|i| puts "Laugh Intensity: #{i} Saying: #{laugh * i}"}

# Exercise 4
[1,3,10,2,7].each{|i| puts i}

# Exercise 5
# def find_min (arr); min = arr[0]; arr.each{|i| if i< min; min = i; end; }; min; end; puts find_min([-2, -5, -3])
def find_min(arr)
    min = arr[0] 
    arr.each{|i| min = i if i< min }; 
    min; 
end; 

puts find_min([-2, -5, -3])

# Exercise 6
def get_grade(arr)
    grade = 0.0
    arr.each{|i| grade += i};
    grade /= arr.length
    # (arr.sum / arr.length.to_f).round(2)
end
puts "#{get_grade([77,80,85,88])}%"

# Exercise 7
def list_even
    (1..100).select{|i| i if i % 2 == 0} # Can put 'even =' at the beginning for readability
end

puts list_even.to_s;

# Exercise 8
def count_passing(arr, passedScore)
    passer = 0
    arr.each{|i| passer+=1 if i >= passedScore}
    passer
    # arr.count {|i| i>= passedScore}
end

puts count_passing([10, 5, 8, 7, 9], 8)

# Exercise 9
def triple_values(arr)
    arr.collect{|i| i*i*i}
end

puts triple_values([2, 1, 6, -3]).to_s

# Exercise 10
def digit_to_word(arr)
    arr.collect{|i| unless i == 0; i; else; "zero"; end; }
    # arr.collect{|i| i.zero? ? "zero" : i}
end

puts digit_to_word([1, 0, 0, -2]).to_s

# Exercise 11
def return_hash(arr)
    {
        first: arr[0],
        last: arr[arr.length-1],
        size: arr.length,
    }
end

puts return_hash([1, 5, 10, -2])

# Exercise 12
def moving_values(arr)
    arr.insert(-1, arr.delete_at(0))
end

puts moving_values( [2, 6, 11, 8, -2]).to_s