#include <stdio.h>
#include <stdlib.h>
//Autora: Letícia Karolina Moreira

typedef struct
{
	int color;
	int value;
	bool painted;
}Graph;

int op;
int m;
int n;

int main()
{
	int colors = 1;
	int value;
	int size;
	n = 0;
	m = 0;
	
	printf("Quantos elementos tera o grafo? ");
	scanf("%d",&size);
	
	Graph graph[size];
	int connections[size][size];
	int draft[size];
	for(n=0;n<size;n++)
	{
		printf("Insira o valor: ");
		scanf("%d",&graph[n].value);
		draft[n] = graph[n].value;
	}
	system("pause");
	system("cls");
	for(m=0;m<size;m++)
	{
		for(n=m;n<size;n++)
		{
			printf("%d esta ligado a %d ? SIM [1] | NAO [2]: ",draft[m], graph[n].value);
			scanf("%d",&value);
			if(value == 1)
			{
				connections[m][n] = 1;
				connections[n][m] = 1;
			}
			else if(value == 2)
			{
				connections[m][n] = 0;
				connections[n][m] = 0;
			}
			else
			{
				printf("\nValor invalido !\n");
				n--;
			}
			system("cls");
		}
	}
	for(m=0;m<size;m++)
	{
		for(n=0;n<size;n++)
		{
			if(connections[m][n]==1)
			{
				if(graph[n].painted==true)
				{
					if(graph[n].color==colors)
					{
						colors++;	
					}
				}
			}
		}
		
		graph[m].color = colors;
		graph[m].painted = true;
		colors = 1;
	}
	for(m=0;m<size;m++)
	{
		printf("Valor - %d | Cor - %d\n",graph[m].value,graph[m].color);
	}
	printf("Ver conexoes [1] | Sair [2]: ");
	scanf("%d",&op);
	printf("\n\n\n\n");
	if(op==1)
	{
		for(m=0;m<size;m++)
		{
			if(m==0)
			{
				printf("x  %d  ",graph[m].value);
			}
			else
			{
				printf("%d  ",graph[m].value);
			}
		}
		printf("\n\n");
		for(m=0;m<size;m++)
		{
			printf("%d  ",graph[m].value);
			for(n=0;n<size;n++)
			{
				printf("%d  ",connections[m][n]);
			}
			printf("\n\n");
		}
	}
}