require_relative "character"

class Shaman < Character
    def heal
        @manna += 10
        self
    end

    def attack
        @manna -= 2 unless @manna < 2
        self
    end

    def teleport
        @manna -= 3 unless @manna < 3
        self
    end
end

shaman1 = Shaman.new(10).attack.attack.attack.teleport.teleport.heal.show_stats