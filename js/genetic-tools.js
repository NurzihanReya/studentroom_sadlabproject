const GeneticAlgorithm = {
    selection : {
        RouletteWheel(probabilities){
            let probabilitiesSum = probabilities.reduce((sum, current) => sum + current, 0);
            probabilities = probabilities.map(probability => probability / probabilitiesSum);

            let cumSum = 0;
            probabilities = probabilities.map(probability => cumSum += probability);

            const randomNumber = Math.random();
            for(let probabilityIndex in probabilities){
                if(probabilities[probabilityIndex] > randomNumber) return +probabilityIndex;
            }
        },
        RandomSelection(probabilities){
            return Math.floor(Math.random() * probabilities.length);
        }
    },

    pairing : {
        Sequential(population){
            let result = [];
            for(let i = 0; i < population.length; i += 2){
                result.push([
                    population[i],
                    population[i + 1]
                ]);
            }
            return result;
        },

        Fitness(population, calcFitness){
            population.sort((a, b) => calcFitness(b) - calcFitness(a));

            return GeneticAlgorithm.pairing.Sequential(population);
        },

        RouletteWheel(population){
            throw new Error('this method is not implemented yet');
        }
    },

    crossOver : {
        SinglePoint(parent1, parent2){
            const randIndex = Math.floor(Math.random() * parent1.length);

            return [
                [...parent1.slice(0, randIndex), ...parent2.slice(randIndex)],
                [...parent2.slice(0, randIndex), ...parent1.slice(randIndex)]
            ];
        },
        TwoPoint(parent1, parent2){
            const randIndexA = Math.floor(Math.random() * (parent1.length - 1));
            const randIndexB = Math.floor(Math.random() * (parent1.length - randIndexA + 1)) + randIndexA + 1;

            return [
                [
                    ...parent1.slice(0, randIndexA),
                    ...parent2.slice(randIndexA, randIndexB),
                    ...parent1.slice(randIndexB)
                ],
                [
                    ...parent2.slice(0, randIndexA),
                    ...parent1.slice(randIndexA, randIndexB),
                    ...parent2.slice(randIndexB)
                ]
            ];
        },

        Uniform(parent1, parent2){
            const childA = Array(parent1.length);
            const childB = Array(parent1.length);

            for(let i = 0; i < parent1.length; i ++){
                if(Math.floor(Math.random() * 2)){
                    childA[i] = parent1[i];
                    childB[i] = parent2[i];
                }else{
                    childA[i] = parent2[i];
                    childB[i] = parent1[i];
                }
            }

            return [
                childA,
                childB
            ];
        }
    }
};
