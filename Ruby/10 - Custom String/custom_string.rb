
class CustomString
    def initialize
        @string = ""
    end

    def append (*str)
        str = str.join("")
        @string.insert(@string.length, str)
        self
    end

    def prepend (*str)
        str = str.join("")
        @string.insert(0, str)
        self
    end

    def output
        puts @string
    end
end

challenge1 = CustomString.new.append("Ruby").append("&", "Rails").prepend("I", " love ").output
challenge2 = CustomString.new.append("A").append(["B", "C", "D"], ["E", "F", "G", "H"]).prepend(["w", "x"], ["y", "z"]).output