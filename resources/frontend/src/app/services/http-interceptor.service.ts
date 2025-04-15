import {Injectable} from '@angular/core';
import {
    HttpRequest,
    HttpHandler,
    HttpEvent,
    HttpInterceptor,
    HttpResponse,
    HttpErrorResponse,
} from '@angular/common/http';
import {Router} from "@angular/router";
import {Observable, of} from 'rxjs';
import {tap, catchError} from 'rxjs/operators';
import {empty} from "rxjs/index";
import {throwError} from "rxjs/index";

@Injectable()
export class RequestInterceptor implements HttpInterceptor {

    constructor(private router: Router) {
    }

    intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {

        return next.handle(request).pipe(
            catchError(event => {
                if (event instanceof HttpErrorResponse && event.status == 404) {
                    this.router.navigate(['/error']);
                    return empty();
                }

                return throwError('Connection Error');
            })
        );
    }

}