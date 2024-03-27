require_relative "developer"

class Junior < Developer
    @@junior_count = 0
    def initialize
        super
        @energy = 150
        @@junior_count+=1
    end

    def how_many
        puts "There are #{@@junior_count} Juniors like you my good sir/ma'am!"
    end
end

junior = Junior.new
junior1 = Junior.new
junior2 = Junior.new

junior2.how_many