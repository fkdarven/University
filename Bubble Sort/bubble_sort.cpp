#include <stdio.h>
#include <stdlib.h>

int option;
int vector[5];
int i = 0;
void save()
{
	FILE *archive;
	archive = fopen("document.txt","a");
	if(archive==NULL)
	{
		printf("Erro ao abrir o arquivo !");
		return;
	}
	for(i=0;i<5;i++)
	{
		fprintf(archive,"%i",vector[i]);
		fprintf(archive,"%s","\t");		
	}
	fprintf(archive,"%s","\r\n---------------------------------------------------------------------------------\r\n");
	fclose(archive);
}
void organise()
{	
	int flag;
	int auxiliar;
	for(;;)
	{
		for(i=0;i<4;i++)
		{
			if(vector[i]>vector[i+1])
			{
				auxiliar = vector[i];
				vector[i] = vector[i+1];
				vector[i+1] = auxiliar;
				flag = 1;
			}
		}
		if (flag==0)
		{
			return;
		}
		flag = 0;
	}

}
void print()
{
	for(i=0;i<5;i++)
	{
		printf("%d\t", vector[i]);				
	}
	printf("\n\n");
	system("pause");
}

int main(int argc, char** argv)
{
	for(i=0;i<5;i++)
	{
		printf("Insira o valor a ser inserido na posicao %d: ",i+1);
		scanf("%i",&vector[i]);
	}
	save();
	organise();
	save();			
	print();
	printf("Deseja abrir o arquivo txt com os valores gravados? 1 - Sim | 2 - Nao: ");
	scanf("%d",&option);
	if(option==1)
	{
		system("document.txt");
	}
	return 0;
}
