#install.packages("jsonlite")

library(data.table)
library(jsonlite)

# filePath <- "c://Users//ernayana//Desktop//Hackathon//Hacakthon - Sample Data//Use Case 3//Complaint Data.csv"
#filename <- args[1]

readData("ComplaintData.csv");

readData <- function(filePath){
  dataFile <<- fread(filePath, header = T)
  columnNames <- colnames(dataFile)
  write_json(columnNames, "columnNames.json")
  basicInfo();
}

basicInfo <- function(){
  ## no. of complaints rdressed
  totalComplaints <- nrow(dataFile)
  uniqueComplaints <- length(unique(dataFile$`Complaint Type`))
  redressedComplaints <- length(which(dataFile$`Is Complaint Redressed?`=="YES"))
  notRedressedComplaints <- length(which(dataFile$`Is Complaint Redressed?`=="NO"))
  avgComplaintResolTime <- as.integer(mean(dataFile$`Time Taken for comlaint Redressal`, na.rm = T))
  basicInfo <- list()
  basicInfo[[1]] <- totalComplaints
  basicInfo[[2]] <- uniqueComplaints
  basicInfo[[3]] <- redressedComplaints
  basicInfo[[4]] <- notRedressedComplaints
  basicInfo[[5]] <- avgComplaintResolTime
  basicInfo[[6]] <- wordCloud()
  names(basicInfo) <- c("totalComplaints","uniqueComplaints","redressedComplaints","notRedressedComplaints","avgComplaintResolTime","wordCloud")
  write_json(basicInfo,"basicInfo.json")
  wordCloud();
}

wordCloud <- function(){
  uniqueVal <- unique(dataFile$`Complaint Type`)
  uniqueValFreq <- as.data.frame(table(dataFile$`Complaint Type`))
  colnames(uniqueValFreq) <- c("problem","count")
  uniqueValFreq <- uniqueValFreq[order(uniqueValFreq[,2], decreasing = T),]
  row.names(uniqueValFreq) <- NULL
  write_json(uniqueValFreq,"wordCloud.json")
  return(uniqueValFreq)
}


  
  