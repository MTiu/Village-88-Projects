class Character
    attr_accessor :manna
    
    def initialize(manna = 100)
        @manna = manna
    end

    def show_stats
        puts "Manna is #{@manna}"
    end
end