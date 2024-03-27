class MobilePhone
    attr_reader :call_balance, :text_balance, :sms_deduction, :call_deduction, :sim
    def initialize
        @sim = generate_sim
        @text_balance = 100.0
        @call_balance = 100.0
        @sms_deduction = 1
        @call_deduction = 1.5
    end
    
    def load(balance,type)
        @text_balance += balance if type == "text"
        @call_balance += balance if type == "call"
        self
    end

    def communicate(type, message)
        puts message
        if type == "text" and @text_balance >= 1 
            @text_balance -= @sms_deduction 
        elsif type == "call" and @call_balance >= 1.5
            @call_balance -= @call_deduction 
        else
            puts "#{(type == "text")? "Text" : "Call"} Balance is Insufficient!!"
        end
        self
    end

    def sim_information
        puts "SIM card number: #{@sim}, Text Balance: #{@text_balance}, Call Balance: #{@call_balance}, SMS Deduction Rate: #{@sms_deduction}, Call Deduction Rate: #{@call_deduction}"
    end

    private
    def generate_sim
        rand(10000000000000000000..99999999999999999999)
    end
end

phone = MobilePhone.new
phone.communicate("text", "Hello World!")