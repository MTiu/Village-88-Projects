class Certificate
    attr_accessor :title, :awardee
    def initialize(title, awardee)
        @title = title
        @awardee = awardee
    end

    def announce
        puts "#{@title}: #{@awardee}"
    end
end

cert = Certificate.new("Proficient in Backend", "Philip Campani")
puts cert.title # => "Proficient in Backend"
cert.announce  # => "Proficient in Backend: Philip Campani"
# 3 mins