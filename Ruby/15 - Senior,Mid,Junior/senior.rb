require_relative "developer"

class Senior < Developer
    def initialize
        super
        @knowledge = 90
    end
    
    def interview
        if @time >= 0.5
            @time -= 0.5
        else
            puts "Not enough time!"
        end
    end

    def assign(developer)
        developer.time += 2
    end
end

developer1 = Developer.new
senior = Senior.new

developer1.code_review(senior)
puts senior.knowledge

senior.assign(developer1)
puts developer1.time

senior.interview
puts senior.time