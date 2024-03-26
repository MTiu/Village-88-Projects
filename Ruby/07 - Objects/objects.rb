t1 = {course: "Web Fundamentals Track", weeks: "2"}
t2 = {course: "PHP Track", weeks: "4"}
t3 = {course: "JS Track", weeks: "4"}
t4 = {course: "Elective Track", weeks: "3"}

tracks = [t1, t2, t3, t4]

def print_arr(arr)
    puts "You have #{arr.length} courses in the 'tracks' array"
    arr.each{|track| puts "The course is '#{track[:course]}' in #{track[:weeks]} weeks"}
end

print_arr(tracks)