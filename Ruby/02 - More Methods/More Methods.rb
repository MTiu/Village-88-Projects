array = ['Mashiro','Kurayami','Hikari']

#1st .at or .fetch
puts "======= at or fetch ==========="
puts array.fetch(10, "None!")
puts array.at(0)

#2nd .delete 
puts "========= Delete Return ========="
array2 = array.delete("Mashiro") #=> Deleted Mashiro so returned Mashiro
puts array2

puts "======== After Delete =========="
puts array

puts "======== Reverse =========="
puts array.reverse

puts "======= Length ======="
puts array.length

puts "======= Sort ======="
array3 = [10, 9, 8, 7, 6, 5, 4, 3, 2, 1]
puts array3.to_s
puts array3.sort.to_s

puts "======= Slice ======="
puts array3.sort.slice(0, 5).to_s

puts "======= Shuffle ======="
puts array3.shuffle.to_s

puts "======= Join ======="
puts array.join(' to ')

puts "======= Insert ======="
array.insert(array.length, "Mashiro")
puts array

puts "======= Values_at() ======="
puts array.values_at(array.length-1)

puts "======= Final ======="
array4 = array.values_at(0,1).reverse.join(" to ").insert(-1,"ni Mashiro ga sundeiru!"); puts array4
