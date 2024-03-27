class Developer
    attr_accessor :knowledge, :time, :energy
    def initialize
        @knowledge = 80
        @time = 8
        @energy = 100
    end

    def code_review(developer)
        if developer.class.ancestors.include?(Developer)
            developer.knowledge+=1 
        else
            puts "NOT A DEVELOPER!"
        end
    end
end

developer1 = Developer.new
developer2 = Developer.new

developer1.code_review(developer2)
puts developer2.knowledge