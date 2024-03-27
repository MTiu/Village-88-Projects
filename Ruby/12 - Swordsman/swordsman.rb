require_relative "character"

class Swordsman < Character
    def initialize(manna = 120)
        super(manna)
    end

    def slash
        @manna -= 5 unless @manna < 5
        self
    end

    def double_hit
        @manna -= 10 unless @manna < 10
        self
    end

    def combo_slash
        @manna -= 20 unless @manna < 20
        self
    end
end

swordman1 = Swordsman.new().double_hit.double_hit.double_hit.combo_slash.combo_slash.slash.slash.show_stats