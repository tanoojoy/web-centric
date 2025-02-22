var denominations = [1,3,7];
var M = 10;

console.log(minNumCoins(0));
console.log(minNumCoins(1));
console.log(minNumCoins(2));
console.log(minNumCoins(3));

function minNumCoins(M, d){
    var minCoin = [];
    var tempMin;

    for(var i=1;i<=M;i++){
        minCoin[i] = M;
        for(var j=0;j<denominations.length;j++){
            if(i > denominations[j]){
                tempMin = minCoin[i - denominations[j]] + 1;
                if(tempMin < minCoin[i]){
                    minCoin[i] = tempMin;
                }
            }
        }
    }
    return minCoin[M];
}