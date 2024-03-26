myRange = (1..5)

# Min
puts myRange.min

# Max
puts myRange.max

#last
puts myRange.last

def include_example (number, range)
    "Yes it includes!" if range.include?(number)
end

#include?
puts include_example(4, myRange)
