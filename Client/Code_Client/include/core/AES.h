#pragma once
//  д��һ��AES��C++ʵ�֣���֧��128λ��Կ�� д�ô�æ�������淶�������ο���

//    AES.h

#ifndef AES_H_
#define AES_H_

#include <bitset>
#include <utility>
#include <string>

using namespace std;

class AES
{
public:

	typedef unsigned char    byte;
private:
	static const int KEY_SIZE = 16;    //    ��Կ����Ϊ128λ
	static const int N_ROUND = 11;
	byte plainText[16];    //    ����
	byte state[16];    //    ��ǰ���顣
	byte cipherKey[16];    //    ��Կ
	byte roundKey[N_ROUND][16];    //����Կ
	byte cipherText[16];    //����
	byte SBox[16][16];    //    S��
	byte InvSBox[16][16];    //    ��S��    
	void EncryptionProcess();    
	void DecryptionProcess();
	void Round(const int& round);
	void InvRound(const int& round);
	void FinalRound();
	void InvFinalRound();
	void KeyExpansion();
	void AddRoundKey(const int& round);    
	void SubBytes();    
	void InvSubBytes();
	void ShiftRows();    
	void InvShiftRows();
	void MixColumns();    
	void InvMixColumns();
	void BuildSBox();
	void BuildInvSBox();
	void InitialState(const byte* text);
	void InitialCipherText();    
	void InitialplainText();        
	byte GFMultplyByte(const byte& left, const byte& right);
	const byte* GFMultplyBytesMatrix(const byte* left, const byte* right);
	//
	void Swap(byte& left, byte& right);
	//
public:    
	AES();
	~AES(){};
	const byte* Cipher(const byte* text, const byte* key, const int& keySize);    
	const byte* InvCipher(const byte* text, const byte* key, const int& keySize);
	

	//key must be 128 bit(16byte), outStr should be alloc and deleted outside the function
	void Decrypt (const byte* inStr, unsigned int count, byte* outStr, const byte* key);
	//key must be 128 bit(16byte), outStr should be alloc and deleted outside the function
	void Encrypt (const byte* inStr, unsigned int count, byte* outStr, const byte* key);
};
#endif