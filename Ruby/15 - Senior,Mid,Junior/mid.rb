require_relative "developer"

class Mid < Developer
    def initialize
        super
        @knowledge = 85
    end

    def pair_programming(developer)
        if (developer.time >= 3 and developer.energy >= 3) and (@time >= 3 and @energy >= 3)
            @time -= 3; @energy -=3
            developer.time -=3; developer.energy -=3
        else
            puts "Can't do pair preogramming session!!"
        end
    end

    def break
        @energy = 100
    end
end

developer1 = Developer.new
mid = Mid.new

mid.pair_programming(developer1)
puts "Developer Time: #{developer1.time}, Developer Energy: #{developer1.energy}"
puts "Mid Time: #{mid.time}, Mid Energy: #{mid.energy}"

mid.break
puts "Mid Time: #{mid.time}, Mid Energy: #{mid.energy}"
