import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';


@Injectable({
  providedIn: 'root',
})

export class RoomService {
  baseUrl = 'http://localhost:8080/api';

  constructor(private http: HttpClient) {}

  getAll() {

    return this.http.get(`${this.baseUrl}/salas`).pipe(

      map((res: any) => {

        return res['data'];

      })

    );

  };

  send(form: string) {

    return this.http.post(`${this.baseUrl}/store`, { data: form }).pipe(

      map((res: any) => {

        return res['data'];

      })

    );

  }

  book(row: any) {

    return this.http.post(`${this.baseUrl}/agendar`, { data: row }).pipe(

      map((res: any) => {

        return res['data'];

      })

    );

  }

}

