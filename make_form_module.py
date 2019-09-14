# -*- coding: utf-8 -*-
import vk_api
from vk_api.utils import get_random_id
token = '32712196578cf7aecc15acc6b628d6d59230d25ec51e99fd64a90f9f9a1f7a5211aff4d3990145a0819d9'

import time
import pymysql
from vk_api.longpoll import VkLongPoll, VkEventType

def get_connection():
	connection = pymysql.connect(host='localhost',
								 user='root',
								 password='1234567890',
								 db='univol',
								 cursorclass=pymysql.cursors.DictCursor)
	return connection

def send_data(vk_id,role,login,password,name,telephone,emails,about):
	conn = get_connection()
	cursor = conn.cursor()
	cursor.execute(f"""INSERT INTO users (login, password, salt, type, name, phone, link, email, about) VALUES \
			                           	   ("{login}","{password}","j$HU%v%!","{role}","{name}","{telephone}","vk.com/{vk_id}"","{emails}","{about}",)""")
	conn.commit()
	conn.close()

def check_vk_id(vk_id):
	conn = get_connection()
	cursor = conn.cursor()
	cursor.execute(f"SELECT id FROM users WHERE id = {vk_id}")
	result = cursor.fetchall()
	conn.close()
	return result!=()

def delete_statement(vk_id):
	conn = get_connection()
	cursor = conn.cursor()
	cursor.execute(f"DELETE FROM users WHERE id = {vk_id}")
	conn.close()

text = ""
def handle(user_id):
	while True:
		try:
			print(user_id)
			if text == "справка":
				yield 	"""Привет!
				Если вы хотите подать заявку, напишите 'Подать заявку'
				Если хотите удалить свою заявку, напишите 'Удалить заявку'
						"""
			elif text=="удалить заявку":
				if check_vk_id(user_id):
					delete_statement(user_id)
					yield "Заявка удалена"
				else:
					yield "Вы не подавали заявку"
			elif text=='подать заявку':
				if check_vk_id(user_id):
					yield "Вы уже подали заявку. Хотите исправить? Напишите 'Удалить заявку'"
					continue
				yield "Вы волонтер или организатор?"
				role,login,password,name,telephone,emails,directions,links,about=None,None,None,None,None,None,None,None,None
				role = text
				
				yield "Придумайте себе логин для сайта:"
				login = text
				yield "Придумайте себе пароль для сайта:"
				password = text

				if role=="волонтер":
					yield "Введите свои фамилию, имя, отчество:"
					name = text
					# yield "Введи свою дату рождения:"
					# birth_day = text
					# yield "Введи свое место работы или учёбы:"
					# workplace = text
					# yield "Введи свой адрес:"
					# address = text
					yield "Введите свой номер телефона:"
					telephone = text
					yield "Введите свой e-mail:"
					email = text
					yield "На какие направления вы хотели бы пойти?(введите 'Направления', чтобы получить соответствующую справку)"
					if text=="направления":
						with open('directions.txt','r') as f:
							data = f.read() + '\nНа какие направления вы хотели бы пойти?'
							data = data.split('\n')
							yield data
					
					directions = text
				elif role=="организатор":
					yield "Введите название организации:"
					name = text
					yield "Введите свой номер телефона:"
					telephone = text
					yield "Введите свой e-mail:"
					email = text					
					yield "Введите описание своего проекта:"
					about = text
					
					
				else:
					yield "Неизвестная роль"
					continue
				while text!='да' or text!='нет':
					yield "Все введенные данные верны?(да/нет)"
					if text=="да":
						send_data(user_id,role,login,password,name,telephone,emails,about)
						yield "Твои данные отправлены"
						break
					elif text=="нет":
						yield "Заявка отменена"						
			else:
				yield "Я тебя не понял. Может, тебе нужна справка? Введи 'Справка'"
		except Exception as e:
			yield e

if __name__ == "__main__":
	session = vk_api.VkApi(token=token)
	vk = session.get_api()
	longpoll = VkLongPoll(session)
	print('start polling')
	handlers={}
	try:
		for event in longpoll.listen():
			if event.type == VkEventType.MESSAGE_NEW and event.text != "" and event.to_me:
				user_id = event.user_id
				text = event.text.lower()
				print(text)
				if handlers.get(event.user_id,None)==None:
					handlers[user_id]=handle(user_id)
					print('newbie',user_id)
				response = next(handlers[user_id])
				if type(response) == type(list()):
					print(response)
					for i in response:
						vk.messages.send(
									user_id=event.user_id,
									message=i,
									random_id=get_random_id()
									)
				else:
					vk.messages.send(
									user_id=event.user_id,
									message=response,
									random_id=get_random_id()
									)
	except Exception as e:
		vk.messages.send(
			user_id=event.user_id,
			message=e,
			random_id=get_random_id()
		)