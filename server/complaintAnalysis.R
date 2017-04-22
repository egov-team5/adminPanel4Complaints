#install.packages("jsonlite")

library(data.table)
library(jsonlite)
# filePath <- "c://Users//ernayana//Desktop//Hackathon//Hacakthon - Sample Data//Use Case 3//Complaint Data.csv"
# columnName <- "Complaint Type"

readData <- function(filePath){
  dataFile <<- fread(filePath, header = T)
  columnNames <- colnames(dataFile)
  return(toJSON(columnNames, auto_unbox = T))
}

columnExploration <- function(columnName){
  uniqueVal <- unique(dataFile[[columnName]])
  uniqueValFreq <- as.data.frame(table(dataFile[[columnName]]))
  colnames(uniqueValFreq) <- c(columnName,"Frequency")
  uniqueValFreq <- uniqueValFreq[order(uniqueValFreq[,2], decreasing = T),]
  row.names(uniqueValFreq) <- NULL
  return(toJSON(uniqueValFreq, auto_unbox = T))
}


  
  