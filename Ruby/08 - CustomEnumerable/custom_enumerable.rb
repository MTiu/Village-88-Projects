module CustomEnumerable
    def my_each
        for i in 0...self.length
            yield self[i]
        end
    end

    def my_detect
        for i in self
            return i if yield i
        end
        nil
    end

    def my_find_all
        arr = []
        for i in self
            arr.push(i) if yield i
        end
        arr
    end
end

class Array
    include CustomEnumerable
end

class Range
    include CustomEnumerable
end

# [1,2,3,4].my_each { |i| puts i }
# [1,2,3,4].my_each { |i| puts i * 10 }
puts (1..100).my_detect { |i| i %5 == 0 and i % 7 == 0 } # => 35
puts (1..10).my_find_all { |i| i % 3 == 0 }.to_s # => [3, 6, 9]